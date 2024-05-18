<div class="page-section cta">
  <div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Név</th>
                    <th>Megjegyzés</th>
                    <th>Dátum</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dbh = new PDO('mysql:host=api.uniassist.hu;dbname=CoffeeShop', 'CoffeeShop', '92-rhGz^D26%',
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                // Define your SQL query before using it
                $sql = "SELECT * FROM comments ORDER BY id DESC";
                
                $result = $dbh->query($sql);
                
                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row["fullname"] . "</td>";
                        echo "<td>" . $row["comment"] . "</td>";
                        echo "<td>" . $row["created_at"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nem érkezett új megjegyzés :(</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>