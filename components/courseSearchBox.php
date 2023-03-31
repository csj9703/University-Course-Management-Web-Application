<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  <div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header"><b>Search For Courses</b></div>
    <div class="card-body">
      <h6 class="card-title">Search Options: </h6>
      <div class="input-group rounded">
        <!-- Course Semester Selection -->
        <div class="input-group mt-3 mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="cSemesterSelect">Course Semester: </lable>
          </div>
          <?php $semArr = query_semesters($conn); ?>
          <select class="form-select <?php echo $cSemErr ? 'is-invalid' : null; ?>" name="course_semester" id="cSemesterSelect">
            <option selected>Choose Semester</option>
            <?php for ($i = 0; $i < sizeof($semArr); $i++) : ?>
              <option type="text" value="<?php echo $semArr[$i]['semester']; ?>"><?php echo $semArr[$i]['semester']; ?></option>
            <?php endfor ?>
          </select>
          <div class="invalid-feedback">
            <?php echo $cSemErr; ?>
          </div>
        </div>
        <!-- Course Department Selection -->
        <div class="input-group mt-3 mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="cDepartSelect">Course Department: </lable>
          </div>
          <?php $depArr = query_departments($conn); ?>
          <select class="form-select <?php echo $cDepErr ? 'is-invalid' : null; ?>" name="course_department" id="cDepartSelect">
            <option selected>Choose Course Department</option>
            <?php for ($i = 0; $i < sizeof($depArr); $i++) : ?>
              <option value="<?php echo "{$depArr[$i]['dep_name']},{$depArr[$i]['dep_title']}"; ?>"><?php echo "{$depArr[$i]['dep_name']} - {$depArr[$i]['dep_title']}"; ?></option>
            <?php endfor ?>
          </select>
          <div class="invalid-feedback">
            <?php echo $cDepErr; ?>
          </div>
        </div>
        <!-- Course Number Input -->
        <div class="input-group mt-3 mb-3">
          <span class="input-group-text">Course Number: </span>
          <select class="form-select " id="cNumSelect" name="cNumRange">
            <option selected>Choose Course Number Range</option>
            <option value="200,299">200 - 299</option>
            <option value="300,399">300 - 399</option>
            <option value="400,499">400 - 499</option>
            <option value="500,599">500 - 599</option>
            <option value="600,699">600 - 699</option>
          </select>
        </div>
        <!-- Course Name Input -->
        <div class="input-group mt-3 mb-3">
          <span class="input-group-text">Course Name: </span>
          <input type="text" class="form-control" name="course_name" placeholder="Enter a course name">
        </div>
        <!-- Anti-Req Accordion Collapse -->
        <div class="input-group mt-3 mb-3">
          <a class="accordion-button collapsed" style="text-decoration: none;" data-bs-toggle="collapse" data-bs-target="#antiReqCollapse" aria-expanded="false" aria-controls="antiReqCollapse">Has Anti-requisite(s)</a>
        </div>
        <div class="card card-body collapse" aria-expanded="false" id="antiReqCollapse">
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text">Anti-requitsite Course(s): </span>
            <input type="text" class="form-control" name="antiReq" placeholder="Enter antirequisites...">
          </div>
        </div>
        <!-- Pre-Req Accordion Collapse -->
        <div class="input-group mt-3 mb-3">
          <a class="accordion-button collapsed" style="text-decoration: none;" data-bs-toggle="collapse" data-bs-target="#preReqCollapse" aria-expanded="false" aria-controls="antiReqCollapse">Has Pre-requisite(s)</a>
        </div>
        <div class="card card-body collapse" aria-expanded="false" id="preReqCollapse">
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text">Pre-requitsite Course(s): </span>
            <input type="text" class="form-control" name="preReq" placeholder="Enter prerequisites...">
          </div>
        </div>
        <div class="input-group mt-3 mb-3">
          <button type="submit" name="search" class="btn btn-primary">Search</button>
        </div>
      </div>
    </div>
  </div>