package main
//package template

import (
	"database/sql"  // Pacote Database SQL para realizar Query
	"net/http"      // Gerencia URLs e Servidor Web
	//"text/template" // Gerencia templates
	"log"
	"os"
	_ "github.com/go-sql-driver/mysql" // Driver Mysql para Go
)
//Struct utilizada para exibir dados no template
type Prod struct {
	Codigo    int
	Nome  string
	Lagura string
	Comprimento string
	Altura string
	Peso string
}

// Função dbConn, abre a conexão com o banco de dados
func dbConn() (db *sql.DB) {
	dbDriver := "mysql"
	dbUser := "root"
	dbPass := ""
	dbName := "login"

	db, err := sql.Open(dbDriver, dbUser+":"+dbPass+"@/"+dbName)
	if err != nil {
		panic(err.Error())
	}
	return db
}
// 	var tmpl = template.Must(template.ParseGlob("tmpl/*"))

// type justFilesFilesystem struct {
//     fs http.FileSystem
// }

// func (fs justFilesFilesystem) Open(name string) (http.File, error) {
//     f, err := fs.fs.Open(name)
//     if err != nil {
//         return nil, err
//     }
//     return neuteredReaddirFile{f}, nil
// }

// type neuteredReaddirFile struct {
//     http.File
// }

// func (f neuteredReaddirFile) Readdir(count int) ([]os.FileInfo, error) {
//     return nil, nil
// }
func main() {

	// Exibe mensagem que o servidor foi iniciado
	log.Println("Server started on: http://localhost:9000")

	// fs := justFilesFilesystem{http.Dir("template/")}
 // 	http.Handle("/template/", http.StripPrefix("/template/", http.FileServer(fs)))
	// // Gerencia as URLs
	// http.HandleFunc("/", Index)
	// http.HandleFunc("/show", Show)
	// http.HandleFunc("/new", New)
	// http.HandleFunc("/edit", Edit)

	// // Ações
	// http.HandleFunc("/insert", Insert)
	// http.HandleFunc("/update", Update)
	// http.HandleFunc("/delete", Delete)

	// // Inicia o servidor na porta 9000
	http.ListenAndServe(":9000", nil)
}
func Show(w http.ResponseWriter, r *http.Request) {
	db := dbConn()

	// Pega o ID do parametro da URL
	nId := r.URL.Query().Get("codigo")

	// Usa o ID para fazer a consulta e tratar erros
	selDB, err := db.Query("SELECT * FROM busca_objetos WHERE codigo=?", nId)
	if err != nil {
		panic(err.Error())
	}

	// Monta a strcut para ser utilizada no template
	p := Prod{}

	// Realiza a estrutura de repetição pegando todos os valores do banco
	for selDB.Next() {
		// Armazena os valores em variaveis
		var codigo int
		var name, largura, comprimento, altura, peso string

		// Faz o Scan do SELECT
		err = selDB.Scan(&codigo, &name, &largura, &comprimento, &altura, &peso)
		if err != nil {
			panic(err.Error())
		}

		// Envia os resultados para a struct
		p.Codigo = codigo
		p.Name = name
		p.Largura = largura
		p.Comprimento = comprimento
		p.Altura = altura
		p.Peso = peso

	}

	// Mostra o template
	//tmpl.ExecuteTemplate(w, "Show", p)

	// Fecha a conexão
	defer db.Close()

}
