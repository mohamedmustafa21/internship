<?php $__env->startSection('content'); ?>
    <div class="container" >
        <div class="row" style="padding:20px;">
            <div class="card">
                <div class="card-title">
                    <h3 class="col-md">Student Records</h3>
                </div>
                <div class="card-body" style="overflow-x: auto;">
                    <div class="flex d-flex" style="margin-bottom: 2%;">
                        <!-- exportAcceptedInterns -->
                        <button class="btn btn-primary col-md-3 float-right" onclick="location.href='/export/interns';" type="button" style="background: #140d45;color: whitesmoke;border-radius: 11px;">Download Interns</button>
                        <button class="btn btn-primary col-md-3 float-right" onclick="location.href='/export/acceptedinterns';" type="button" style="background: #140d45;color: whitesmoke;border-radius: 11px;">Download Accepted Interns</button>
                    </div>
                    <input type="text" id="search" class="form-control mb-3" placeholder="Search...">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="max-height: 800px; overflow-y: auto;">
                            <thead>
                                <tr>
                                    <th>IsAccepted</th>
                                    <th>Round</th>
                                    <th>Full Name</th>
                                    <th>Preferred Industry</th>
                                    <th>Preferred Training Field</th>
                                    <th>University</th>
                                    <th>Bachelor Degree</th>
                                    <th>Graduation Year</th>
                                    <th>Grade</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Major</th>
                                    <th>Certificate</th>
                                    <th>ID Card</th>
                                    <th>Training Info</th>
                                    <th>know about us</th>
                                    <th>Other Source </th>
                                    <th>Referral Name</th>
                                    <th>Solid Work Rating</th>
                                    <th>AutoCAD Rating</th>
                                    <th>Birthdate</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>training 10th of Ramadan</th>
                                    <th>Ain Elsokhna</th>
                                    <th>Opinion</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="form-check" style="margin: 1.4em;">
                                            <input class="form-check-input is_accepted_checkbox" type="checkbox" data-intern-id="<?php echo e($student->id); ?>" <?php if($student->IsAccepted): ?> checked <?php endif; ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <select data-intern-id="<?php echo e($student->id); ?>" id="roundmyDropdown">
                                            <option value="">-- Choose Round --</option>
                                            <option value="Round 1 - July 2023" <?php echo e(old('$round') == 'Round 1 - July 2023' || $student->round == 'Round 1 - July 2023' ? 'selected' : ''); ?>>Round 1 - July 2023</option>
                                            <option value="Round 2 - Augest 2023" <?php echo e(old('$round') == 'Round 2 - Augest 2023' || $student->round == 'Round 2 - Augest 2023' ? 'selected' : ''); ?>>Round 2 - August 2023</option>
                                        </select>
                                    </td>
                                    <td><?php echo e($student->full_name); ?></td>
                                    <td><?php echo e($student->preferred_industry); ?></td>
                                    <td><?php echo e($student->preferred_training_field); ?></td>
                                    <td><?php echo e($student->university); ?></td>
                                    <td><?php echo e($student->bachelor_degree); ?></td>
                                    <td><?php echo e($student->graduation_year); ?></td>
                                    <td><?php echo e($student->grade); ?></td>
                                    <td><?php echo e($student->city); ?></td>
                                    <td><?php echo e($student->address); ?></td>
                                    <td><?php echo e($student->major); ?></td>
                                    <td><a href="<?php echo e(asset('assets/'.$student->grade_certificate)); ?>">File uploaded</a></td>
                                    <td><a href="<?php echo e(asset('assets/'.$student->student_id_card)); ?>">File uploaded</a></td>
                                    <td><?php echo e($student->training_info); ?></td>
                                    <td><?php echo e($student->source); ?></td>
                                    <td><?php echo e($student->other); ?></td>
                                    <td><?php echo e($student->referral_name); ?></td>
                                    <td><?php echo e($student->solidwork); ?></td>
                                    <td><?php echo e($student->autocade); ?></td>
                                    <td><?php echo e($student->birthdate); ?></td>
                                    <td><?php echo e($student->mobile); ?></td>
                                    <td><?php echo e($student->email); ?></td>
                                    <td><?php echo e($student->training_10th_of_Ramadan == 'I Agree' ? 'I Agree Training in 10th of Ramadan' : 'Don\'t Agree'); ?></td>
                                    <td><?php echo e($student->training_ain_sokhna == 'I Agree' ? 'I Agree Training in 10th of Ramadan' : 'Don\'t Agree'); ?></td>
                                    <td><?php echo e($student->intern_opinion); ?></td>
                                    <td>
                                        <button class="btn btn-danger remove-intern-btn" data-supervisor-id="<?php echo e($student->id); ?>">Remove</button>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <?php echo e($students->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    //check box
    $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change','#roundmyDropdown',function(){
      var internId = $(this).attr('data-intern-id');
      var round = $(this).val();
      console.log("sssssssssssss");
      $.ajax({
            url: '/hr/saveRound/',
            type: 'GET',
            dataType: 'json',
            data: { round: round, internId: internId },
            success: function(response) {
                // handle success
                console.log(response);

            },
            error: function(xhr) {
                // handle error
                console.log(xhr.response);

            }
        });

    });
    $('input[type="checkbox"]').on('change', function() {
        var internId = $(this).attr('data-intern-id');
        var isChecked = $(this).is(':checked');
        console.log(internId);
        console.log(isChecked);


        $.ajax({
            url: '/interns/' + internId + '/accept',
            type: 'GET',
            dataType: 'json',
            data: { is_accepted: isChecked },
            success: function(response) {
                // handle success
                console.log(response);
            },
            error: function(xhr) {
                // handle error
                console.log(xhr.response);

            }
        });
    });
});
var loginBtn = document.querySelector('.modal-selector');
        loginBtn.addEventListener('click', function() {
            $('#addSupervisorModal').modal('show');
        });


// var loginBtn = document.querySelector('.modal-selector');
//         loginBtn.addEventListener('click', function() {
//             $('#addSupervisorModal').modal('show');
//         });

    var typeDropdown = document.getElementById('type');

    // Get the industry group element
    var industryGroup = document.getElementById('industry-group');

    // Show/hide the industry group based on the selected value of the type dropdown
    typeDropdown.addEventListener('change', function() {
    if (typeDropdown.value === 'supervisor') {
        industryGroup.style.display = 'block';
    } else {
        industryGroup.style.display = 'none';
    }
    });

    $(document).ready(function() {
        $('.remove-intern-btn').on('click', function() {
    var supervisorId = $(this).data('supervisor-id');

    $.ajax({
        url: '/hr/reomve-intern/' + supervisorId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Display success message or perform any other actions
            location.reload();

        },
        error: function(xhr, status, error) {
            // Display error message or perform any other error handling
            alert('An error occurred while removing the intern.');
        }
    });
});

});
</script>


<?php if(session('success')): ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?php echo e(session('success')); ?>'
            });
        });
    </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/zhufapmy/public_html/internships/internshipPortal/resources/views/dashboard.blade.php ENDPATH**/ ?>