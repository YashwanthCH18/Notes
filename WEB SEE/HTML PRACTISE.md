<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enhanced Form Example</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    label, input, button, select, textarea {
      display: block;
      width: 100%;
      margin-bottom: 10px;
    }
    fieldset {
      border: 1px solid #ccc;
      padding: 15px;
      margin-bottom: 20px;
    }
    legend {
      font-weight: bold;
      padding: 0 10px;
    }
    button {
      background: green;
      color: white;
      padding: 10px;
      border: none;
      cursor: pointer;
    }
    .radio-group, .checkbox-group {
      display: flex;
      flex-direction: row;
      gap: 10px;
      margin-bottom: 10px;
    }
    .radio-group label, .checkbox-group label {
      display: inline;
      width: auto;
    }
  </style>
</head>
<body>
  <div class="form-container" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); width: 400px; padding: 20px;">
    <h2>Register</h2>
    <form>
      <!-- Personal Information Fieldset -->
      <fieldset>
        <legend>Personal Information</legend>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob">
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required minlength="6">
      </fieldset>
      
      <!-- Preferences Fieldset -->
      <fieldset>
        <legend>Preferences</legend>
        
        <label>Gender</label>
        <div class="radio-group">
          <label for="male">
            <input type="radio" id="male" name="gender" value="male"> Male
          </label>
          <label for="female">
            <input type="radio" id="female" name="gender" value="female"> Female
          </label>
          <label for="other">
            <input type="radio" id="other" name="gender" value="other"> Other
          </label>
        </div>
        
        <div class="checkbox-group">
          <label for="subscribe">
            <input type="checkbox" id="subscribe" name="subscribe"> Subscribe to Newsletter
          </label>
        </div>
      </fieldset>
      
      <!-- Additional Information Fieldset -->
      <fieldset>
        <legend>Additional Information</legend>
        
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject">
        
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5"></textarea>
        
        <label for="country">Country</label>
        <select id="country" name="country">
          <option value="">Select a country</option>
          <option value="usa">USA</option>
          <option value="canada">Canada</option>
          <option value="uk">UK</option>
          <!-- Add more countries as needed -->
        </select>
      </fieldset>
      
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
