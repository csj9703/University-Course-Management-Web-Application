<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
      <div class="card-header">Search For Courses</div>
      <div class="card-body">
        <h6 class="card-title">Search Options: </h6>
        <div class="input-group rounded">
          <!-- Course Department Input -->
          <div class="input-group mt-3 mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="cDepartSelect">Course Department: </lable>
            </div>
            <select class="form-select" id="cDepartSelect">
              <option selected>Choose Course Department</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <!-- Course Number Input -->
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text">Course Number: </span>
            <input type="text" class="form-control" placeholder="Enter a course number">
          </div>
          <!-- Course Name Input -->
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text">Course Name: </span>
            <input type="text" class="form-control" placeholder="Enter a course name">
          </div>
          <!-- Anti-Req Accordion Collapse -->
          <div class="input-group mt-3 mb-3">
            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#antiReqCollapse" aria-expanded="false" aria-controls="antiReqCollapse">Has Anti-requisite(s)</button>
          </div>
          <div class="card card-body collapse" aria-expanded="false" id="antiReqCollapse">
            <div class="input-group mt-3 mb-3">
              <span class="input-group-text">Anti-requitsite Course(s): </span>
              <input type="text" class="form-control" placeholder="Enter Anti-requisite courses separated by comma ',' (E.g. CPSC 203, CPSC 205)">
            </div>
          </div>
          <!-- Pre-Req Accordion Collapse -->
          <div class="input-group mt-3 mb-3">
            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#preReqCollapse" aria-expanded="false" aria-controls="antiReqCollapse">Has Pre-requisite(s)</button>
          </div>
          <div class="card card-body collapse" aria-expanded="false" id="preReqCollapse">
            <div class="input-group mt-3 mb-3">
              <span class="input-group-text">Pre-requitsite Course(s): </span>
              <input type="text" class="form-control" placeholder="Enter Pre-requisite courses separated by comma ',' (E.g. CPSC 203, CPSC 205)">
            </div>
          </div>
          <div class="input-group mt-3 mb-3">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </div>
      </div>
    </div>