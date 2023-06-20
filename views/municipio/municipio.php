<div class="col-4">
    <label for="inputState" class="form-label">Municipio</label>
    <select id="Municipio" class="form-select">
         <?php foreach ($municipios as $com): ?>
        <option value="<?php echo $com->getIdMunicipio(); ?>"><?php echo $com->getNome(); ?></option>
        <?php endforeach; ?>
    </select>
</div>

