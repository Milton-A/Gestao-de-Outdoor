<div class="form-group">
    <label for="inputState" class="form-label">Provincia</label>
    <select id="Provincia" class="form-control">
        <?php foreach ($provincias as $pro): ?>
        <option value="<?php echo $pro->getIdPrivincia(); ?>"><?php echo $pro->getNome(); ?></option>
        <?php endforeach; ?>
    </select>
</div>
