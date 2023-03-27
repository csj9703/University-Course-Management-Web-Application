<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header">Create a Course</div>
    <div class="card-body">
        <h6 class="card-title">Course Information: </h6>
        <div class="input-group rounded">
            <!-- Course Semester Selection -->
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="cSemesterSelect">Course Semester: </lable>
                </div>
                <select class="form-select" id="cSemesterSelect">
                    <!-- Semester Placeholder -->
                    <option selected>Choose Semester</option>
                    <option value="1">FALL 2022</option>
                    <option value="2">WINTER 2023</option>
                    <option value="3">SPRING 2023</option>
                </select>
            </div>
            <!-- Course Department Selection -->
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="cDepartSelect">Course Department: </lable>
                </div>
                <select class="form-select" id="cDepartSelect">
                    <!-- Department Placeholder -->
                    <option selected>Choose Course Department</option>
                    <option value="1">CPSC</option>
                    <option value="2">MATH</option>
                    <option value="3">SENG</option>
                </select>
            </div>
            <!-- Course Number Input -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Course Number: </span>
                <input type="text" class="form-control" placeholder="Enter the course number">
            </div>
            <!-- Course Name Input -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Course Name: </span>
                <input type="text" class="form-control" placeholder="Enter the course name">
            </div>
            <!-- Course Description Longtext Input -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Course Description: </span>
                <textarea class="form-control" aria-label="Course Description"></textarea>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>