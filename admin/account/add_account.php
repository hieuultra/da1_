<div class="container-fluid mt-4 px-4">
  <h1 class="mt-4">Add Account</h1>
  <form action="index.php?act=add_account" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" class="form-control" name="name_acc">
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="text" class="form-control" name="password">
    </div>
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <input type="text" class="form-control" name="address">
    </div>
    <div class="mb-3">
      <label class="form-label">Phone</label>
      <input type="text" class="form-control" name="phone">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="text" class="form-control" name="email">
    </div>
    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" class="form-control" name="image">
    </div>
    
    <input type="submit" class="btn btn-primary" name="them" value="ADD">
    <a href="?act=list_account">
    <input type="button" class="btn btn-primary" value="LIST_ADD">
      </a>
  </form>
</div>