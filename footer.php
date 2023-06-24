<section id="footerPr">
    <div class="footerCtn container">
        <div class="categoriesFooter globalFooter">
                <h4>CATEGORIES</h4>
            <p>Women</p>
            <p>Men</p>
            <p>Accecories</p>
        </div>
        <div class="helpFooter globalFooter">
                <h4>HELP</h4>
            <p>Track order</p>
            <p>Shipping</p>
            <p>Returns</p>
            <p>FAQs</p>
        </div>
        <div class="getInTouchFooter globalFooter">
                <h4>GET IN TOUCH</h4>
            <p>Any question? please visit our shop on Jalan Ahmad Yani IV, South Jakarta. Or call us at (0815-2243-7623).</p>
        </div>
        <div class="newsletterFooter globalFooter">
                <h4>NEWSLATTER</h4>
            <div class="wrapInput">
                <input type="text" id="inputFooter" placeholder="email@example.com">
                <div class="focusInput"></div>
            </div>
            <p>SUBSCRIBE</p>
        </div>
    </div>
    <div class="copyRight">
        <p>Copyright &#169 All rights reserved | This web create by Keanu! &#10084	 </p>
    </div>
</section>

<script>
    let input = document.getElementById("inputFooter");
    input.addEventListener("focus", function() {
        let wr = document.querySelector(".focusInput");
        wr.style.width = "100%"
        input.addEventListener("focusout", function() {
            wr.style.width = 0;
        })
    })
</script>
