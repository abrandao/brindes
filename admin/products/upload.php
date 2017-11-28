<form method="POST" action="file-upload.php" enctype="multipart/form-data">
  
  <label for="code">Código</label>
  <input type="number" name="code" /></br>

  <label for="title">Título</label>
  <input type="text" name="title" /></br>
  
  <label for="tag_main">Tag Principal</label>
  <input type="text" name="tag_main" /></br>

  <label for="tag_category">Tag Categoria</label>
  <input type="text" name="tag_category" /></br>

  <label for="folder">Pasta</label>
  <input type="text" name="folder" /></br>

  <label for="upfile">Imagem(s)</label>
  <input type="file" name="upfile[]" multiple /></br>

  <label for="quantity_A">quantidade A</label>
  <input type="number" name="quantity_A" /></br>

  <label for="quantity_B">quantidade B</label>
  <input type="number" name="quantity_B" /></br>

  <label for="quantity_C">quantidade C</label>
  <input type="number" name="quantity_C" /></br>

  <label for="description">Descrição</label>
  <input type="text" name="description" /></br>

  <label for="size">Tamanho</label>
  <input type="text" name="size" /></br>

  <label for="printing">Gravação</label>
  <input type="text" name="printing" /></br>

  <button type="submit" value="send values">Enviar</button>
</form>