<!-- TODO: Link Course List Backened -->
<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header">Course Details</div>
    <div class="card-body">
        <div class="input-group rounded">

            <!-- Course Name -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Course Name: </span>
            </div>
            <!-- Course Description -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Course Description: </span>
            </div>
            <!-- Course Credits -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Course Credits: </span>
            </div>
            <!-- Prerequisites Info -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Prerequisites: </span>
            </div>
            <!-- Antirequisites Info -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Antirequisites: </span>
            </div>
            <!-- Department Info -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Department: </span>
            </div>

            <!-- Section Info -->
            <div class="input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#courseCollapse" aria-expanded="false" aria-controls="antiReqCollapse">Sections</button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="courseCollapse">

                <div class="card text-dark bg-light mb-3">
                    <span class="input-group-text">Section 1: </span>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Professor: </span>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Textbooks: </span>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Class Time: </span>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Additional required materials: </span>
                    </div>
                </div>

                <div class="card text-dark bg-light mb-3">
                    <span class="input-group-text">Section 2: </span>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Professor: </span>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Textbooks: </span>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Additional required materials: </span>
                    </div>
                </div>

            </div>

            <!-- Course evaluation -->
            <div class="input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#courseEvalCollapse" aria-expanded="false" aria-controls="courseEvalCollapse">Course Evaluation</button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="courseEvalCollapse">
                
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Course Difficulty: </span>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Course Workload: </span>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Course Rating: </span>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Course Comments: </span>
                </div>

            </div>
        </div>
    </div>
</div>
