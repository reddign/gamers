function createFrame() {
    var ifrm = document.createElement("iframe");
    ifrm.setAttribute("src", "jayrunner_exports/jayrunner.html");
    ifrm.style.display = "flex";
    ifrm.style.margin = "auto";
    ifrm.style.width = "100em";
    ifrm.style.height = "50em";
    document.getElementById("gameWindow").appendChild(ifrm);
}

createFrame();
