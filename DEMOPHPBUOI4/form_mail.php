<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>Email Form</h2>
  <form action="send_email.php" method="post">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" 
      placeholder="Enter name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="to_email">To Email:</label>
      <input type="email" class="form-control" id="to_email"
      placeholder="Enter to email" name="to_email">
    </div>
    <div class="mb-3">
      <label for="subject">Subject:</label>
      <input type="text" class="form-control" id="subject" 
      placeholder="Enter subject" name="subject">
    </div>
    <div class="mb-3">
      <label for="message">Message:</label>
      <input type="text" class="form-control" id="message" 
      placeholder="Enter message" name="message">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
