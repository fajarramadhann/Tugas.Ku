<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tugas.Ku</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar bg-body">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fa-solid fa-list-check"></i>
        Tugas.Ku
      </a>
      <button type="button" class="btn btn-primary disabled"><a class="text-white text-decoration-none"
          href="login.html"><i class="fa-solid fa-right-to-bracket text-white"></i> Login</a></button>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fa-regular fa-plus"></i> Tambah Tugas</button>

        <!-- Modal -->
        <form action="insert.php" method="POST">
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tugas</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <h6>Nama Tugas</h6>
                  <div class="input-group">
                    <input type="text" name="list" class="form-control" aria-label="Sizing example input"
                      aria-describedby="inputGroup-sizing-default" placeholder="Tugas kamu">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"><i
                      class="fa-solid fa-floppy-disk"></i> Save</button>
                </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  <div class="container">
    <div class="row">
      
    </div>
  </div>

  <!-- get data -->
  <?php
  include "config.php";
  $rawData = mysqli_query($con, "SELECT * FROM tbltodo");
  ?>

  <div class="container mt-4">
    <div class="row mt-4">
      <div class="col-md-6 offset-md-3">
        <?php
        while ($row = mysqli_fetch_array($rawData)) {
          ?>

          <ul class="list-group" id="task-list">
            <li class="list-group-item d-flex mb-3 align-items-center">
              <!-- <?php echo $row['id'] ?> -->
              <input class="form-check-input me-4 mb-1" type="checkbox" value="" id="firstCheckbox">
              <?php echo $row['list'] ?>
              <a href="#" class="btn btn-primary btn-sm ms-auto me-2 edit-button" type="button" data-bs-toggle="modal"
                data-bs-target="#editModal" data-taskid="<?php echo $row['id']; ?>"><i class=" fa-regular
                fa-pen-to-square"></i></>
                <!-- <button class="btn btn-danger btn-sm" type="button"><i class="fa-solid fa-delete-left"></i></button> -->
                <a href="delete.php? ID= <?php echo $row['id'] ?>" class="btn btn-danger btn-sm" type=""><i
                    class="fa-solid fa-delete-left"></i></a>
            </li>
          </ul>
          <?php
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Modal Penyuntingan Tugas -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Tugas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="edit.php" method="POST">
            <input type="hidden" id="taskId" name="task_id">
            <div class="mb-3">
              <label for="editTask" class="form-label">Nama Tugas</label>
              <input type="text" class="form-control" id="editTask" name="edit_task" placeholder="Nama Tugas">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script>
    var editButtons = document.getElementsByClassName("edit-button");
    var modal = document.getElementById("editModal");
    var taskIdInput = document.getElementById("taskId");
    var editTaskInput = document.getElementById("editTask");

    // Tambahkan event listener ke setiap tombol "Edit"
    for (var i = 0; i < editButtons.length; i++) {
      editButtons[i].addEventListener("click", function () {
        var taskId = this.getAttribute("data-taskid");
        var taskName = this.parentElement.innerText.trim();

        // Isi input penyuntingan dengan nama tugas yang ada saat ini
        editTaskInput.value = taskName;
        taskIdInput.value = taskId;

        // Tampilkan modal penyuntingan
        modal.classList.add("show");
        modal.style.display = "block";
      });
    }

    // Tutup modal saat tombol "Close" diklik atau di luar modal diklik
    modal.addEventListener("click", function (event) {
      if (event.target === modal || event.target.classList.contains("btn-close")) {
        modal.classList.remove("show");
        modal.style.display = "none";
      }
    });
  </script>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</body>

</html>