
<script>
    var inp = document.getElementById("tel");

    inp.onclick = function () {
        inp.value = "+998(";
    }

    var old = 0;

    inp.onkeydown = function () {
        var curLen = inp.value.length;

        if (curLen < old) {
            old--;
            return;
        }



        if (curLen == 7)
            inp.value = inp.value + ")-";

        if (curLen == 12)
            inp.value = inp.value + "-";

        if (curLen == 15)
            inp.value = inp.value + "-";

        if (curLen > 17)
            inp.value = inp.value.substring(0, inp.value.length - 1);

        old++;
    }

</script>

</body>
</html>