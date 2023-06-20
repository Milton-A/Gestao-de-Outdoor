<div class="col-4">
    <label for="inputState" class="form-label">Comuna</label>
    <select id="Comuna" name="comuna" class="form-select">
        <?php foreach ($comunas as $com): ?>
        <option value="<?php echo $com->getIdComuna(); ?>" ><?php echo $com->getNomeComuna(); ?></option>
        <?php endforeach; ?>
    </select>
</div>
