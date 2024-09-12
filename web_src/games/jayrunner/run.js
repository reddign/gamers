function createFrame() {
    var ifrm = document.createElement("iframe");
    ifrm.setAttribute("src", "jayrunner_exports/jayrunner.html");
    ifrm.style.width = "1600px";
    ifrm.style.height = "900px";
    // ifrm.style.alignContent = "center";
    document.getElementById("gameWindow").appendChild(ifrm);
}

createFrame();
