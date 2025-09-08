<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h1 class="text-center"><?php echo e(__('Assign Students')); ?></h1>
          </div>
          <div class="card-body">
            <form method="GET" action="<?php echo e(route('assignStudent')); ?>" style="line-height:3;">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label for="supervisor"><?php echo e(__('Industry')); ?></label>    
                <select id="industry-dropdown" class="form-control " name="industry-dropdown" onchange="updateTrainingFields()">
                  <option value="" disabled selected>Select an option</option>
                  <option value="Lighting" <?php echo e(old('preferred_industry') == 'Lighting' ? 'selected' : ''); ?>>Lighting</option>
                  <option value="Panels" <?php echo e(old('preferred_industry') == 'Panels' ? 'selected' : ''); ?>>Panels</option>
                  <option value="Steel" <?php echo e(old('preferred_industry') == 'Steel' ? 'selected' : ''); ?>>Steel</option>
                  <option value="Sheet Metal Fabrication" <?php echo e(old('preferred_industry') == 'Sheet Metal Fabrication' ? 'selected' : ''); ?>>Sheet Metal Fabrication</option>
                  <option value="Support Functions" <?php echo e(old('preferred_industry') == 'Support Functions' ? 'selected' : ''); ?>>Support Functions</option>
              </select>
              </div>

              <div class="form-group">
                <label for="certificate_type"><?php echo e(__('Certificate Type')); ?></label>    
                <select id="certificate_type" class="form-control " name="certificate_type">
                  <option value="" disabled selected>Select an option</option>
                  <option value="(Manufacturing) Sheet Metal Fabrication Industry" <?php echo e(old('certificate_type') == '(Manufacturing) Sheet Metal Fabrication Industry' ? 'selected' : ''); ?>>(Manufacturing) Sheet Metal Fabrication Industry</option>
                  <option value="(Commercial) Sheet Metal Fabrication Industry" <?php echo e(old('certificate_type') == '(Commercial) Sheet Metal Fabrication Industry' ? 'selected' : ''); ?>>(Commercial) Sheet Metal Fabrication Industry</option>
                  <option value="(Manufacturing) Lighting Industry" <?php echo e(old('certificate_type') == '(Manufacturing) Lighting Industry' ? 'selected' : ''); ?>>(Manufacturing) Lighting Industry</option>
                  <option value="(Commercial) Lighting Industry" <?php echo e(old('certificate_type') == '(Commercial) Lighting Industry' ? 'selected' : ''); ?>>(Commercial) Lighting Industry</option>
                  <option value="(Manufacturing) Panels Industry" <?php echo e(old('certificate_type') == '(Manufacturing) Panels Industry' ? 'selected' : ''); ?>>(Manufacturing) Panels Industry</option>
                  <option value="(Commercial) Panels Industry" <?php echo e(old('certificate_type') == '(Commercial) Panels Industry' ? 'selected' : ''); ?>>(Commercial) Panels Industry</option>
                  <option value="(Manufacturing) Steel Industry " <?php echo e(old('certificate_type') == '(Manufacturing) Steel Industry' ? 'selected' : ''); ?>>(Manufacturing) Steel Industry </option>
                  <option value="(Commercial) Steel Industry " <?php echo e(old('certificate_type') == '(Commercial) Steel Industry' ? 'selected' : ''); ?>>(Commercial) Steel Industry </option>
                  <option value="(ICT) Information & Communication Technology " <?php echo e(old('certificate_type') == '(ICT) Information & Communication Technology' ? 'selected' : ''); ?>>(ICT) Information & Communication Technology</option>
                  <option value="(HR) Human Resources" <?php echo e(old('certificate_type') == '(HR) Human Resources' ? 'selected' : ''); ?>>(HR) Human Resources </option>
                  <option value="Finance" <?php echo e(old('certificate_type') == 'Finance' ? 'selected' : ''); ?>>Finance</option>
                  <option value="(HSE) Health and safety" <?php echo e(old('certificate_type') == '(HSE) Health and safety' ? 'selected' : ''); ?>>(HSE) Health and safety</option>
              </select>
              </div>
              
              <div class="form-group">
                <label for="training_field"><?php echo e(__('Training Field')); ?></label>
                <select class="form-control" id="training_field" name="training_field">
                  <option value="">Select Training field</option>
                </select>
              </div>

              <div class="form-group">
                <label for="supervisor"><?php echo e(__('Supervisor')); ?></label>
                <select class="form-control" id="supervisors" name="supervisor">
                  <option value="">Select supervisor</option>
                </select>
              </div>

              

              <div class="form-group">
                <label for="intern"><?php echo e(__('Interns')); ?></label>
                <select class="form-control" id="interns" name="intern">
                  <option value="">Select interns</option>
                  
                </select>
              </div>

              <button type="submit" class="btn btn-primary" style="display: block;margin: 28px auto;width: 119px;"><?php echo e(__('Assign')); ?></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>

function updateTrainingFields() {
        var preferredIndustry = document.getElementById("industry-dropdown").value;
        var trainingFieldSelect = document.getElementById("training_field");

        // Clear existing options
        trainingFieldSelect.innerHTML = '<option value="">-- Select Preferred Training Field --</option>';

        if (preferredIndustry === "Lighting" || preferredIndustry === "Sheet Metal Fabrication" || preferredIndustry === "Steel" || preferredIndustry === "Panels") {
            var trainingFields = ["Technical Office (Engineers only)", "Commercial (Engineers only)", "Manufacturing (Engineers only)"];
            
            // Add new options
            trainingFields.forEach(function(trainingField) {
                var option = document.createElement("option");
                option.value = trainingField;
                option.text = trainingField;
                trainingFieldSelect.appendChild(option);
            });

            // Show the container
            
        } else {
            var trainingFields = ["Human Resources", "Health and Safty","Finance","Information Technology"];
            // Add new options
            trainingFields.forEach(function(trainingField) {
                var option = document.createElement("option");
                option.value = trainingField;
                option.text = trainingField;
                trainingFieldSelect.appendChild(option);
            });
            // Hide the container
            
        }
    }
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
            },
            error: function(xhr) {
                // handle error
                console.log(xhr.response);

            }
        });
    });
});
function updateTrainingFieldsforAssign() {
        var preferredIndustryAssign = document.getElementById("industry").value;
        var trainingFieldSelectAssign = document.getElementById("training_field_assign");

        // Clear existing options
        trainingFieldSelectAssign.innerHTML = '<option value="">-- Select Preferred Training Field --</option>';

        if (preferredIndustryAssign === "Lighting" || preferredIndustryAssign === "Sheet Metal Fabrication" || preferredIndustryAssign === "Steel" || preferredIndustryAssign === "Panels") {
            var trainingFieldsAssign = ["Technical Office (Engineers only)", "Commercial (Engineers only)", "Manufacturing (Engineers only)"];
            
            // Add new options
            trainingFieldsAssign.forEach(function(trainingField) {
                var option = document.createElement("option");
                option.value = trainingField;
                option.text = trainingField;
                trainingFieldSelectAssign.appendChild(option);
            });

            // Show the container
            
        } else {
            var trainingFieldsAssign = ["Human Resources", "Health and Safty","Finance","Information Technology"];
            // Add new options
            trainingFieldsAssign.forEach(function(trainingField) {
                var option = document.createElement("option");
                option.value = trainingField;
                option.text = trainingField;
                trainingFieldSelectAssign.appendChild(option);
            });
            // Hide the container
            
        }
    }
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

    var typeDropdown = document.getElementById('type');

    // Get the industry group element
    var industryGroup = document.getElementById('industry-group');
    var training_field_assign_id = document.getElementById('training_field_assign_id');

    // Show/hide the industry group based on the selected value of the type dropdown
    typeDropdown.addEventListener('change', function() {
    if (typeDropdown.value === 'supervisor') {
        industryGroup.style.display = 'block';
        training_field_assign_id.style.display = 'block';
    } else {
        industryGroup.style.display = 'none';
        training_field_assign_id.style.display = 'none';
    }
    });


    $(document).ready(function() {
    $('#training_field').change(function() {
        var industry = $('#industry-dropdown').val();
        var training_field = $(this).val();
        
        $.ajax({
            url: '<?php echo e(route("get-users-interns")); ?>',
            type: 'GET',
            data: { industry: industry, training_field:training_field },
            success: function(response) {
                var usersDropdown = $('#supervisors');
                var internsDropdown = $('#interns');
                
                usersDropdown.empty();
                internsDropdown.empty();
                
                $.each(response.data.users, function(index, user) {
                    usersDropdown.append($('<option>').text(user.name).val(user.id));
                });
                
                $.each(response.data.interns, function(index, intern) {
                    internsDropdown.append($('<option>').text(intern.full_name).val(intern.id));
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/zhufapmy/public_html/internships/internshipPortal/resources/views/hrAssigndashboard.blade.php ENDPATH**/ ?>