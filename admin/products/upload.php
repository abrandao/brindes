<form method="POST" action="file-upload.php" enctype="multipart/form-data">
  
<input type="number" name="code" multiple /></br>
  <input type="text" name="title" multiple /></br>
  <input type="text" name="tag_main" multiple /></br>
  <input type="text" name="tag_category" multiple /></br>

  <input type="file" name="upfile[]" multiple /></br>

  <input type="number" name="quantity_A" multiple /></br>
  <input type="number" name="quantity_B" multiple /></br>
  <input type="number" name="quantity_C" multiple /></br>

  <input type="text" name="description" multiple /></br>
  <input type="text" name="size" multiple /></br>
  <input type="text" name="printing" multiple /></br>

  <button type="submit" value="send values">Enviar</button>
</form>