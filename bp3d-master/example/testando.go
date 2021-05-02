package main

import (

	"fmt"
	"encoding/json"
	"os"
	"io/ioutil"
	"bufio"
	"strings"
)
type Pallet struct {
    Pallet []Pallets `json:Pallets"`
}
type Pallets struct {

    L_palt   string 
    C_palt   string 
    H_palt    string    
    Carga string 
}

type Product struct {
	Nome string `json:"nome"`
}

func main() {

	arquivo, err := os.Open("../../Packing_Light/lib/pallet.json")
	arquivos, err := os.Open("../../Packing_Light/lib/produto.txt")

	if err != nil {
		fmt.Println(err)
		fmt.Println("erro")
	}

	fmt.Println("Successfully Opened json")

	defer arquivo.Close()

	var pallets Pallets
	//var product Product
	byteValue, _ := ioutil.ReadAll(arquivo)


	defer arquivos.Close()


	var linhas []string
	scanner := bufio.NewScanner(arquivos)
	for scanner.Scan() {
		linhas = append(linhas, scanner.Text())
	}


	s := strings.Join(linhas, "")


    replacer := strings.NewReplacer("[[", "", "]]", "", "]", "", "[", "","\"", "")
	s = replacer.Replace(s)
	words := strings.Fields(s)
	split := strings.Split(words[0], ",")


	//fmt.Println(split)

	for i, splits := range split {
	  	inc, vari := i, splits

	  	fmt.Println(vari)
	  	fmt.Println(inc)
	}

	//fmt.Println(echo)
	//byteValue1, _ := ioutil.ReadAll(arquivo1)
	
	erro := json.Unmarshal(byteValue, &pallets)


	if erro != nil {
	    fmt.Println("unmarshalling error ", erro)
	    return
	}

	}
