package main

import (

	"fmt"
	"encoding/json"
	"os"
	"io/ioutil"
)
type Pallet struct {
    Pallet []Pallets `json:Pallet"`
}
type Pallets struct {

    Nome   string 
    C_palt   string 
    H_palt    string    
    Carga string 
}

func main() {

	arquivo, err := os.Open("../../Packing_Light/lib/texto.json")

	// Caso tenha encontrado algum erro ao tentar abrir o arquivo retorne o erro encontrado
	if err != nil {
		fmt.Println(err)
		fmt.Println("erro")
	}
	// Garante que o arquivo sera fechado apos o uso
	fmt.Println("Successfully Opened json")

	defer arquivo.Close()
	//pallets := []Pallets{}
	var pallets Pallets
	byteValue, _ := ioutil.ReadAll(arquivo)
	
	 errr := json.Unmarshal(byteValue, &pallets)
	  if errr != nil {
            fmt.Println("unmarshalling error ", errr)
            return
       }
	fmt.Println(pallets.Nome.(String))
	//fmt.Println(objPallets[0])
	//fmt.Println(pallet.Pallet.carga == "")
		// for i := 0; i < len(pallet.Pallet); i++ {
	 //        fmt.Println("Largura: " + pallet.Pallet[i].l_palt)
	 //        fmt.Println("Comprimento: " + pallet.Pallet[i].c_palt)
	 //        fmt.Println("Altura: " + pallet.Pallet[i].h_palt)
	 //        fmt.Println("Carga: " + pallet.Pallet[i].carga)
  //   	}
	}
