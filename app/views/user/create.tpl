<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form method="post" class="<?= isset($errors) ? 'needs-validation was-validated' : 'needs-validation' ?>" novalidate>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>氏名</label>
                <input type="text" class="form-control" name="name" value="<?= $name ?>" required>
                <?php if(array_key_exists('name', $errors)) { ?>
                <div class="invalid-feedback">
                    40文字以内の全角カタカナ、氏名の間はスペースを入力してください.
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>メール</label>
                <input type="email" class="form-control" name="email" value="<?= $email ?>" required>
                <?php if(array_key_exists('email', $errors)) { ?>
                <div class="invalid-feedback">
                    半角英数で記号は「 @.-_ 」のみ入力可能です
                </div>
                <?php } ?>
            </div>
        </div>
        <button class="btn btn-secondary" type="reset">リセット</button>
        <button class="btn btn-primary" type="submit">確認</button>
    </form>
</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script>
    //
    $(document).ready(function() {
        $('button[type="reset"]').click(function(e) {
            e.preventDefault();
            $('form').removeClass('was-validated');
            $('input[name="name"]').val('');
            $('input[name="email"]').val('');
        });

    });

</script>
</body>
</html>