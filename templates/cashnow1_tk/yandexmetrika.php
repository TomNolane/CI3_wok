
<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter48080987 = new Ya.Metrika({ id:48080987, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/48080987" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<script>
function markTarget(target,param, id) 
{
    if (typeof yaCounter48080987 == 'undefined') return;
	if (typeof param == 'undefined') yaCounter48080987.reachGoal(target);
	else yaCounter48080987.reachGoal(target,param);
    $.ajax({
        type: 'POST',
        url: '/pixel/',
        data: 'id='+id+'&pixel='+param,
        success: function(data){ 
        }
    });
}
</script>