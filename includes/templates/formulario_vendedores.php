<fieldset>
    <legend>Informacion del Vendedor/a</legend>

    <label for="vendedor">Nombre:</label>
    <input type="texto" id="nombre" name="vendedor[nombre]" placeholder="Escriba el nombre del vendedor/a" 
    value="<?php echo s($vendedor->nombre) ; ?>">

    <label for="apellido">Apellido:</label>
    <input type="texto" id="apellido" name="vendedor[apellido]" placeholder="Escriba el apellido del vendedor/a" 
    value="<?php echo s($vendedor->apellido) ; ?>">

    <label for="telefono">Telefono:</label>
    <input type="texto" id="telefono" name="vendedor[telefono]" placeholder="Escriba el telefono del vendedor/a" 
    value="<?php echo s($vendedor->telefono) ; ?>">

</fieldset>