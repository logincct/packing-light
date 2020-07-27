let idCounting = 2;

const createField = () => {
    let appDiv = document.getElementById("custom-div");
    let div = document.createElement("div");
    let field = document.createElement("select");
    let label = document.createElement("label");
    let option = document.createElement("option");
    let number = document.createElement("input");
    let img = document.createElement("img");

    // Preencher div.
    div.setAttribute("id", `select${idCounting}`);
    div.setAttribute("class", "select-field");
    // ---

    // Preencher label.
    label.setAttribute("for", "setect_obj");
    label.setAttribute("style", "positon: absolute;");
    label.innerHTML = "Selecione um produto";
    // ---

    // Preencher campo Select.
    field.setAttribute("name", "nome_obj");
    field.setAttribute("style", "position: ralative; margin-left: 45px;")


    // Preencher option.
    option.setAttribute("name", "nome_obj");
    option.setAttribute("value", "");
    // ---

    // Preencher number.
    number.setAttribute("type", "number");
    number.setAttribute("min", "0");
    number.setAttribute("max", "100");
    number.setAttribute("style", "margin: 0 0 0 2px; height: 22px; width: 45px;");
    // ---

    // Preencher imagem.
    img.setAttribute("src", "https://me.org.br/wp-content/uploads/2017/09/x-png-33-3-1-300x300.png");
    img.setAttribute("onclick", `deleteField("select${idCounting}")`);
    // ---

    // Colocar os elementos na ordem (que quiser).
    div.appendChild(img);
    div.appendChild(label);
    div.appendChild(field);
    div.appendChild(number);
    field.appendChild(option);
    
    appDiv.appendChild(div); // div final.

    // Incrementar contador de ID.
    idCounting++;
}

const deleteField = id => {
    let fieldToDelete = document.getElementById(id);
    fieldToDelete.remove();
}