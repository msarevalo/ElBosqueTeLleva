<?php
/**
 * Created by PhpStorm.
 * User: SOPORTE COLOMBIA
 * Date: 8/05/2018
 * Time: 2:48 PM
 */
?>
<form action="cargarImagen.php" enctype="multipart/form-data" method="post">
    <label for="imagen">Imagen:</label>
    <input id="imagen" name="imagen" size="30" type="file" /><br><br>
    <output id="list"></output>

    <script>
        function archivo(evt) {
            var files = evt.target.files; // FileList object

            // Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();

                reader.onload = (function(theFile) {
                    return function(e) {
                        // Insertamos la imagen
                        document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" style= "width: 250px;" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);

                reader.readAsDataURL(f);
            }
        }

        document.getElementById('imagen').addEventListener('change', archivo, false);
    </script><br>
    <input type="submit" value="Enviar" />
</form>
