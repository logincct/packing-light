let idCounting = 2;

const createField = () => {
    let appDiv = document.getElementById("custom-div");

    let div = document.createElement("div");
    let field = document.createElement("select");
    //let span = document.createElement("span");
    //let span1 = document.createElement("span");
    let label = document.createElement("label");
    let option = document.createElement("option");
    // let option1 = document.createElement("option");
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

    //Preenchendo o span
    //span = "<?php while ($row = mysqli_fetch_assoc($listar)) { ?>"
    //span1 = "<?php echo $row['nome']."    "; } ?>"

    // ---

    // Preencher option.

    option.setAttribute("name", "nome_obj");
    option.setAttribute("value", "");

    option.setAttribute("name", "nome_obj");
    option.setAttribute("value", "<?php echo $row['nome'];?>");

    // option1.setAttribute("value", "<?php echo $row['nome'];?>");
    // option1.innerHTML = "<?php echo $row['nome']."    ";?>"

    // ---

    // Preencher imagem.
    img.setAttribute("src", "https://me.org.br/wp-content/uploads/2017/09/x-png-33-3-1-300x300.png");
    img.setAttribute("onclick", `deleteField("select${idCounting}")`);
    // ---

    // Colocar os elementos na ordem (que quiser).
    div.appendChild(img);
    div.appendChild(label);
    div.appendChild(field);
    //field.appendChild(span);
    field.appendChild(option);
    //field.appendChild(span1);

    // field.appendChild(option1);
    
    appDiv.appendChild(div); // div final.

    // Incrementar contador de ID.
    idCounting++;
}

const deleteField = id => {
    let fieldToDelete = document.getElementById(id);
    fieldToDelete.remove();
}