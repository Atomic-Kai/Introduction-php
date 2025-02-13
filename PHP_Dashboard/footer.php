
<!-- Modal -->
<div class="modal fade" id="deleteTeacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Teacher</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <h3>Are you sure to delete this teacher?</h3>
          <input type="hidden" name="remove_value" id="remove_teacher_id">
          <button type="submit" class="btn btn-secondary float-end mx-2" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="btn-remove-teacher" class="btn btn-primary float-end mx-2">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <h3>Are you sure to delete this student?</h3>
          <input type="hidden" name="remove_value" id="remove_student_id">
          <button type="submit" class="btn btn-secondary float-end mx-2" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="btn-remove-student" class="btn btn-primary float-end mx-2">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script>
    $(document).ready(function(){
      // $('#btn-delete').click(function(){
        
      // });
      $(document).on('click','#btn-delete',function(){
          // console.log($(this).parent('td').parent('tr').find('td').eq(0).text());
          var id = $(this).parent('td').parent('tr').find('td').eq(0).text();
          
          $('#remove_teacher_id').val(id);
      });
      $(document).on('click','#btn-delete-student',function(){
        var id = $(this).attr('remove-id')
        $('#remove_student_id').val(id);
      });
    })
  </script>
</body>

</html>