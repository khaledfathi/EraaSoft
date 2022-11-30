<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="container">
        <div class="header"><h1>Courses Subscription Managment</h1></div>

        <div class="nav">
            <ul id="ulNav">
                <li value ="1">Search</li>
                <li value="2">Category</li>
                <li value="3">Courses</li>
                <li value="4">Students</li>
            </ul>
        </div>

        <div class="content">
            <div id="searchDiv" class="search">
                <div>
                    <label for="">Search in</label>
                    <select id="" name="">
                        <option>Category</option>
                        <option>Courses</option>
                        <option selected>Students</option>
                    </select>
                    <label for="">search pattern</label>
                    <select id="" name="">
                        <option selected>Contain</option>
                        <option>Start with</option>
                        <option>End with</option>
                        <option>Exact</option>
                    </select>
                    <input type="text">
                    <button id="searchButton">Search</button>
                </div>
                <div>Search Results</div>
            </div>
            
            <div id="categoryDiv" class="category" >
                <button id="addCategoryButton">New Category</button>
                <div id="addCategoryFields" class="addCategoryFields">
                    <label for="">Category Name</label>
                    <input type="text">
                    <button >Add</button>
                </div>
                <div>category blocks</div>
            </div>
            
            <div id="coursesDiv" class="courses">
                <button id="addCourseButton">New Course</button>
                <div id="addCourseFields" class="addCourseFields">
                    <label for="">Course Name</label>
                    <input type="text">
                    <label for="">Category</label>
                    <select id="" name="">
                        <option>a1</option>
                        <option>a2</option>
                        <option>a3</option>
                    </select>
                    <button >Add</button>
                </div>
                <div>category blocks</div>
            </div>

            <div id="studentsDiv" class="students">
                <button id="addStudentsButton">New Student</button>
                <div id="addStudentsFields" class="addStudentsFields">
                    <label for="">Studnet Name</label>
                    <input type="text">
                    <label for="">Phone</label>
                    <input type="text">
                    <label for="">Email</label>
                    <input type="text">
                    <button >Add</button>
                </div>
                <div>
                    student table block
                </div>
            </div>
        </div>
        <div class="footer">footer</div>
    </div>
</body>
<script src="js/main.js"></script>
</html>
