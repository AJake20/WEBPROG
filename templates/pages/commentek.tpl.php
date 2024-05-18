<section class="page-section about-heading">
    <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/about.jpg">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Ha bármilyen kérdése van</span>
                            <span class="section-heading-lower">&nbsp;A kávézónkról</span>
                        </h2>
                        <form id="commentForm" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="fullname" placeholder="Teljes név" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="email cím" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="comment" rows="10" placeholder="Megjegyzés" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Küldés</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('commentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        var form = event.target;
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/logicals/comment.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle the response here
                    console.log(xhr.responseText);
                    alert("Megjegyzés sikeresen elküldve!");
                } else {
                    console.error('Error occurred: ' + xhr.statusText);
                }
            }
        };
        xhr.send(formData);
    });
</script>
