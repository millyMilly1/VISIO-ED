<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VisioEd</title>
  <link rel="icon" href="../image/0c3946b8-67c6-4624-9739-6493bca6ed0c-removebg-preview.png" type="image/x-icon">
  <style>
	body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  background-color: #f4f4f4;
  color: #333;
  margin: 0;
  padding: 0;
}

.about-us-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

header {
  text-align: center;
  margin-bottom: 40px;
}

.header-content{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    text-decoration: none;
    font-size: large;
}

header h1 {
  font-size: 32px;
  font-weight: bold;
}

.company-info {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

.company-image {
  flex: 1;
  min-width: 300px;
}

.company-image img {
  width: 100%;
  height: auto;
  border-radius: 8px;
}

.company-description {
  flex: 2;
  min-width: 300px;
}

.company-description p {
  margin-bottom: 20px;
}

@media (max-width: 768px) {
  .company-info {
    flex-direction: column;
    align-items: center;
  }

  .company-image,
  .company-description {
    min-width: 100%;
  }
}
	
  </style>
</head>
<body>
  <div class="about-us-container">
    <header>
       
      <h1>About Us</h1>
    </header>
    <section class="company-info">
      <div class="company-image">
        <img src="../image/logo (3).png" alt="Company Image">
      </div>
      <div class="company-description">
        <p>Welcome to VisioEd, a leading provider of inclusive e-learning solutions designed to make education accessible to everyone, especially visually impaired students. Our mission is to create an engaging and supportive learning environment that caters to diverse needs through innovative technology and thoughtful design.</p>
        <p>Founded in 2024, our team is dedicated to empowering students with the tools and resources they need to succeed academically and beyond. Our platform offers a range of features including text-to-speech, language translation, and multi-modal content support to ensure an inclusive and enriching learning experience.</p>
        <p>At VisioEd, we believe that education is a right, not a privilege. We are committed to breaking down barriers and creating opportunities for all learners. Join us on our mission to make education accessible for everyone.</p>
      </div>
    </section>
    <div clas="header-content">
            <a href="javascript:history.back()" class="back-button" aria-label="Go back">
             &larr; Back
            </a>
        </div>
  </div>
</body>
</html>

