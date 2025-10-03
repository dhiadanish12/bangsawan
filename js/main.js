/* Bangsawan Pictures theme JS */
(function(){
  // Small helper: smooth scroll for anchor links
  document.addEventListener('click', function(e){
    const a = e.target.closest('a[href^="#"]');
    if(!a) return;
    const id = a.getAttribute('href').slice(1);
    const el = document.getElementById(id);
    if(el){
      e.preventDefault();
      el.scrollIntoView({behavior:'smooth'});
    }
  });

  // Basic slider for .bw-slider (used by pattern bangsawan/slider)
  function initSlider(root){
    const slides = Array.from(root.querySelectorAll('.wp-block-cover'));
    if(slides.length === 0) return;
    let i = 0;
    const prevBtn = root.querySelector('.bw-prev');
    const nextBtn = root.querySelector('.bw-next');
    const dotsWrap = root.querySelector('.bw-dots');
    const dots = slides.map((_, idx)=>{
      const b = document.createElement('button');
      b.setAttribute('aria-label', 'Go to slide ' + (idx+1));
      dotsWrap && dotsWrap.appendChild(b);
      b.addEventListener('click', ()=>go(idx));
      return b;
    });

    function render(){
      slides.forEach((s, idx)=>s.classList.toggle('is-active', idx === i));
      dots.forEach((d, idx)=>d.classList.toggle('is-active', idx === i));
    }
    function go(n){ i = (n+slides.length)%slides.length; render(); }

    prevBtn && prevBtn.addEventListener('click', ()=>go(i-1));
    nextBtn && nextBtn.addEventListener('click', ()=>go(i+1));

    // auto-advance
    let timer = setInterval(()=>go(i+1), 5000);
    root.addEventListener('mouseenter', ()=>clearInterval(timer));
    root.addEventListener('mouseleave', ()=>{ timer = setInterval(()=>go(i+1), 5000); });

    render();
  }

  document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.bw-slider').forEach(initSlider);
  });
})();
