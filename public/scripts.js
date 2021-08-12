button = () =>{
    let button = document.createElement("button");

    button.setAttribute('class',"submit");
    button.setAttribute('onclick', 'button()');
    //button.addEventListener('onclick', button());
    document.body.appendChild(button);
}
