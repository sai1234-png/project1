<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IShip Registration</title>
    <link rel="stylesheet" href="css2.css">
</head>
<body>
    <header>
        <img src="i_ship.png" alt="Logo" class="logo">
        <div class="tabs">
            <input type="radio" id="radio-1" name="tabs" checked />
            <label class="tab" for="radio-1">Register</label>
            <input type="radio" id="radio-2" name="tabs" />
            <label class="tab" for="radio-2">Submissions</label>
            <span class="glider"></span>
        </div>
    </header>
    
    <div class="container">
        <!-- Registration Form -->
        <div id="registration-form">
            <h2>Register on I-SHIP</h2>
            <form action="submit_registration.php" method="POST">
                <label for="team-number">Team Number:</label>
                <input type="text" id="team-number" name="team_number" required>

                <label for="member1-name">Member 1 Name:</label>
                <input type="text" id="member1-name" name="member1_name" required>

                <label for="member2-name">Member 2 Name:</label>
                <input type="text" id="member2-name" name="member2_name" required>

                <label for="member3-name">Member 3 Name:</label>
                <input type="text" id="member3-name" name="member3_name" required>

                <label for="project-name">Project Name:</label>
                <input type="text" id="project-name" name="project_name" required>

                <label for="tech-stack">Tech Stack Used:</label>
                <div id="tech-stack-options">
                    <input type="checkbox" id="fsd" name="tech_stack[]" value="FSD">
                    <label for="fsd">FSD</label>
                    <input type="checkbox" id="aws" name="tech_stack[]" value="AWS">
                    <label for="aws">AWS</label>
                    <input type="checkbox" id="flutter" name="tech_stack[]" value="Flutter">
                    <label for="flutter">Flutter</label>
                    <input type="checkbox" id="azure" name="tech_stack[]" value="Azure">
                    <label for="azure">Azure</label>
                    <input type="checkbox" id="oracle" name="tech_stack[]" value="Oracle Apex">
                    <label for="oracle">Oracle Apex</label>
                    <input type="checkbox" id="salesforce" name="tech_stack[]" value="Salesforce">
                    <label for="salesforce">Salesforce</label>
                </div>

                <button type="submit" class="button">Submit</button>
            </form>
        </div>
        
        <!-- Submissions Table -->
        <div id="submissions-table" style="display: none;">
            <h2>Submissions</h2>
            <?php
            // Include the PHP script to fetch and display submissions
            include 'fetch_submissions.php';
            ?>
        </div>
    </div>

    <script>
        document.querySelectorAll('input[name="tabs"]').forEach(tab => {
            tab.addEventListener('change', () => {
                document.getElementById('registration-form').style.display = 
                    document.getElementById('radio-1').checked ? 'block' : 'none';
                document.getElementById('submissions-table').style.display = 
                    document.getElementById('radio-2').checked ? 'block' : 'none';
            });
        });

        // Initial form display setting
        document.getElementById('registration-form').style.display = document.getElementById('radio-1').checked ? 'block' : 'none';
        document.getElementById('submissions-table').style.display = document.getElementById('radio-2').checked ? 'block' : 'none';
    </script>
</body>
</html>
