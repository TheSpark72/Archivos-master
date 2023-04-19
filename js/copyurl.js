var copytext = new Clipboard('.copytext');

copytext.on('success', function(e){
    alert("copiado con exito");
});