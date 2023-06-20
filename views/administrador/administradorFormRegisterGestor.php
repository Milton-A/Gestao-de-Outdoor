<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<div class="clearfix"></div><br />

<div class="container">
    <form method='post'>
        <table class='table table-bordered'>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo htmlentities($name) ?>" class="form-control" required></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" value="<?php echo htmlentities($phone) ?>" class="form-control" required></td>
            </tr>
            <tr>
                <td>Your E-mail ID</td>
                <td><input type="text" name="email" value="<?php echo htmlentities($email) ?>" class="form-control" required></td>
            </tr>
            <tr>
                <td>Address</td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-save">
                        <span class="glyphicon glyphicon-plus"></span> Create New Record
                    </button>  
                    <input type="hidden" name="form-submitted" value="1" />
                </td>
            </tr>
        </table>
    </form>
</div>

<?php
include_once 'footer.php';
