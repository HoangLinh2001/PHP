<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $email = $qoh = "";
    session_start();
    if ($_SESSION['s_email'] && $_SESSION['s_qoh']) {
            $email = $_SESSION['s_email'];
            $qoh = $_SESSION['s_qoh'];
            
        }
    ?>
    <div class="container">
        <form method="post" class="col-sm-8">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"
                    class="form-control" name="email" id="email" placeholder="Enter email" />
                <span class="text-danger">
                    <?php echo isset($emailError) ? htmlspecialchars($emailError) : ''; ?>
                </span>
            </div>

            <div class="mb-3 mt-3">
                <label for="qoh" class="form-label">QoH:</label>
                <input type="number" rea value="<?php echo isset($qoh) ? htmlspecialchars($qoh) : ''; ?>" class="form-control"
                    name="password" id="pwd" placeholder="Enter password" />
                <span class="text-danger">
                    <?php echo isset($passwordError) ? htmlspecialchars($passwordError) : ''; ?>
                </span>
            </div>
            <div class="mb-3 mt-3">
                <label for="qoh" class="form-label">QoH:</label>
                <input type="number" value="<?php echo isset($qoh) ? htmlspecialchars($qoh) : ''; ?>" class="form-control"
                    name="password" id="pwd" placeholder="Enter password" />
                <span class="text-danger">
                    <?php echo isset($passwordError) ? htmlspecialchars($passwordError) : ''; ?>
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>