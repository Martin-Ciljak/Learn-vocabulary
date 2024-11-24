<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deutsch - Lernwortschatz</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
        color: #333;
    }

    header {
        background-color: #cc4e00;
        color: white;
        padding: 20px 10px;
        text-align: center;
    }

    h1 {
        margin: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    footer {
        text-align: center;
        margin-top: 20px;
        color: #666;
    }

    button {
        background-color: #cc4e00;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #cc4e00;
    }

    /* General Table Styling */
    table {
        width: 100%;
        /* Make the table take up the full width */
        border-collapse: collapse;
        /* Remove space between cells */
        font-family: Arial, sans-serif;
        font-size: 14px;
        margin: 20px 0;
    }

    .disabled {
        /* Visual effect to show it's disabled */
        display: none;
    }

    /* Table Header Styling */
    th {
        background-color: #ff9800;
        /* Orange */
        color: white;
        text-align: left;
        padding: 12px;
    }

    /* Table Row Styling */
    tr:nth-child(even) {
        background-color: #ffe0b2;
        /* Lighter orange */
    }

    tr:nth-child(odd) {
        background-color: #fff3e0;
        /* Even lighter orange */
    }

    /* Table Cell Styling */
    td {
        padding: 10px;
        border: 1px solid #ffcc80;
        /* Light orange border */
    }

    /* Add Hover Effect */
    tr:hover {
        background-color: #ffd54f;
        /* Bright yellow-orange on hover */
        transition: background-color 0.3s ease;
    }
    </style>
</head>

<body>
    <header>
        <h1>Deutsch - Lernwortschatz</h1>
    </header>
    <div class="container">
        <h2>Beginnen Sie zu lernen!</h2>
        <p>
            Verbessern Sie Ihre Wortschatzkenntnisse auf unterhaltsame und
            spannende Weise.
        </p>
        <!-- <a href="47"><button>Lektion 47</button></a>
        <button onclick="startApp()">Get Started</button> -->
        <div id="buttons">
            <button onclick="vocab_table()">Vocabulary</button>
            <button>Test</button>
        </div>

        <?php
        if (!@include("../../config.php")) {
            die("Failed to include config.php");
        }
        try {
            $pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE.";charset=utf8mb4", DB_USERNAME, DB_PASSWORD );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM `german-47`";
            $stmt = $pdo->query($sql);
            if ($stmt) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo("Nothing failed");
                // echo "<pre>";
                // print_r($results[0]["id"]);
                // echo "</pre>";
                echo "<table id='vocabulary_table' class='disabled'>";
                foreach ($results as $result) {
                    echo "<tr>";
                    echo "<td>".$result["slovak"]."</td>";
                    echo "<td>".$result["german"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo("Query failed.");
            }
            
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </div>
    <footer>
        <p>Created by Martin Čiljak (Chilly)</p>
    </footer>



    <script>
    const table = document.getElementById("vocabulary_table")
    const buttons = document.getElementById("buttons")

    function startApp() {
        alert("Feature coming soon! Stay tuned!");
    }

    function vocab_table() {

        if (table.classList.contains("disabled")) {
            table.classList.remove("disabled");
            buttons.classList.add("disabled")
        } else {
            table.classList.add("disabled")
        }
    }
    </script>
</body>

</html>