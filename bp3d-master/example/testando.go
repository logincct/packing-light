package main

import (
	"bufio"
	"fmt"
	"encoding/json"
	"os"
)
func lerTexto(caminhoDoArquivo string) ([]string) {
	// Abre o arquivo
	arquivo, err := os.Open(caminhoDoArquivo)
	// Caso tenha encontrado algum erro ao tentar abrir o arquivo retorne o erro encontrado
	if err != nil {
		
	}
	// Garante que o arquivo sera fechado apos o uso
	defer arquivo.Close()

	// Cria um scanner que le cada linha do arquivo
	var linhas []string
	scanner := bufio.NewScanner(arquivo)
	for scanner.Scan() {
		linhas = append(linhas, scanner.Text())
	}

	// Retorna as linhas lidas e um erro se ocorrer algum erro no scanner
	return linhas
}

func main() {
	var conteudo []string

	conteudo = nil
	conteudo = lerTexto("../../Packing_Light/lib/texto.json")

	fmt.Println(json.Decoder(conteudo))
	for indice, linha := range conteudo {
		linha1 = linha
		fmt.Println(indice, linha)
	}
}