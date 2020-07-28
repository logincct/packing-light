let idCounting = 2;

const deleteField = id => {
    let fieldToDelete = document.getElementById(id);
    fieldToDelete.remove();
}

const createField = () => {

    let img = document.createElement("img");
    let id = `select${idCounting}`;

    img.setAttribute("src", "https://me.org.br/wp-content/uploads/2017/09/x-png-33-3-1-300x300.png");
    img.setAttribute("onclick", `deleteField("select${idCounting}")`);

    div = document.getElementById('select1');

    parentDiv = document.getElementById('custom-div');
    childDiv = div.cloneNode(true);
    childDiv.setAttribute("id", id);

    childDiv.appendChild(img);

    parentDiv.appendChild( childDiv );

    idCounting++;
}