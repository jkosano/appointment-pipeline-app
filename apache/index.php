<?php
    require_once 'login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>
<body>

    <!--Header-->
    <header id="showcase" class="grid">
        <div class="bgImage"></div>
        <div class=content-wrap>
            <h1>Welcome to the Barbershop</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <a href="#booker" class="button">Book Now</a>
            <a href="#reviews" class="button">Reviews</a>
        </div>
            
    </header>

    <div class="grid" id="header-images">
        <img src="assets/1.jpg">
        <img src="assets/2.jpg">
        <img src="assets/3.jpg">
    </div>

    <button><a href="displayAppointments.php">View All Appointments</a></button>
    <button><a href="todaysAppointments.php">View Today's Appointments</a></button>

    <div class="main-container">
    <div id="booker">
        <h2>Book an Appointment</h2>
        <form method='post' action='createAppointment.php'>
            <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>

            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name"required>

            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone" placeholder="Phone Number"required>


            <label>Select Service</label>
            <select class="form-control" name="service">
                <option value="Adult Haircut - $25">Adult Haircut - $25</option>
                <option value="Child Haircut - $15">Child Haircut - $15</option>
                <option value="Beard - $35">Beard - $35</option>
                <option value="Edgeup - $10">Edgeup - $10</option>
            </select>

            <label>Select Barber</label>
            <select class="form-control" name="barber">
                <option value="1">Bob Parker</option>
                <option value="2">John Smith</option>
                <option value="3">Ashley Martinez</option>
                <option value="4">Joe Johnson</option>
                <option value="4">Joe Johnson</option>
                
            </select>

            <div class="datetime">
                <div>
                    <label>Select Date</label>
                    <input id="datepicker" name="datepicker" width="270" />
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap'
                        });
                    </script>
                </div>

                <div>
                    <div class="time" id="pickTime" ><label>Select Time</label></div>
                    <select class="form-control" name="pickTime">
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="1:30 PM">1:30 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="2:30 PM">2:30 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="4:30 PM">4:30 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div id="reviews">
        <h2>Reviews</h1>
        <a href="#review-form" id="leaveReviewBtn">Write a Review</a>

        <div class="" id="customer-reviews">
            <div id="customer-review-card">
                <div class="card-header">
                    <h4>Brandon</h4>
                    <li>05/20/20</li>
                    <li>5 Stars</li>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui, sit? Alias beatae vitae rerum repellat porro dolor praesentium, non obcaecati numquam. Sequi repellat, similique libero expedita est aspernatur hic suscipit explicabo minus itaque aut ipsam, omnis quod earum culpa aliquid.</p>
            </div>

            <div id="customer-review-card">
                <div class="card-header">
                    <h4>Alex</h4>
                    <li>05/20/20</li>
                    <li>5 Stars</li>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui, sit? Alias beatae vitae rerum repellat porro dolor praesentium, non obcaecati numquam. Sequi repellat, similique libero expedita est aspernatur hic suscipit explicabo minus itaque aut ipsam, omnis quod earum culpa aliquid.</p>
            </div>

            <div id="customer-review-card">
                <div class="card-header">
                    <h4>Alan</h4>
                    <li>05/20/20</li>
                    <li>5 Stars</li>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui, sit? Alias beatae vitae rerum repellat porro dolor praesentium, non obcaecati numquam. Sequi repellat, similique libero expedita est aspernatur hic suscipit explicabo minus itaque aut ipsam, omnis quod earum culpa aliquid.</p>
            </div>

        </div>

        <div id="review-form">
        <h2>Leave a Review</h2>
            <form>
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" required>
                </div>

                <select class="form-control" name="rating" required>
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Stars</option>
                </select>

    
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
    
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description" required>
    

                <button type="submit" class="btn btn-primary" id="btn2">Submit</button>
            </form>
        </div>

    </div>

    <div id="footer">
        <h2>Follow Us</h2>
        <!--<a><img src="/assets/facebook2.svg"></a>
        <a><img src="/assets/instagram.svg" width="100px" height="100px"></a>-->
    </div>

    </div>


</body>


</html>