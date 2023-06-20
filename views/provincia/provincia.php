<div class="col-4">
    <label for="inputState" class="form-label">Provincia</label>
    <select id="Provincia" class="form-select">
        <?php foreach ($provincias as $pro): ?>
        <option value="<?php echo $pro->getIdPrivincia(); ?>"><?php echo $pro->getNome(); ?></option>
        <?php endforeach; ?>
    </select>
</div>