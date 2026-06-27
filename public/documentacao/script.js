/* ===== ShopX — Documentação :: interações ===== */
(function () {
  'use strict';

  /* --- Menu mobile --- */
  const body = document.body;
  const menuBtn = document.getElementById('menuBtn');
  const overlay = document.getElementById('overlay');
  if (menuBtn) menuBtn.addEventListener('click', () => body.classList.toggle('menu-open'));
  if (overlay) overlay.addEventListener('click', () => body.classList.remove('menu-open'));

  /* --- Fecha o menu ao clicar num link (mobile) --- */
  document.querySelectorAll('.nav-links a').forEach(a => {
    a.addEventListener('click', () => { if (window.innerWidth <= 1000) body.classList.remove('menu-open'); });
  });

  /* --- Colapsar grupos do menu --- */
  document.querySelectorAll('.nav-title').forEach(t => {
    t.addEventListener('click', () => t.parentElement.classList.toggle('collapsed'));
  });

  /* --- Destacar link ativo conforme rolagem --- */
  const links = Array.from(document.querySelectorAll('.nav-links a'));
  const map = {};
  links.forEach(a => {
    const id = a.getAttribute('href').slice(1);
    const sec = document.getElementById(id);
    if (sec) map[id] = a;
  });
  const sections = Object.keys(map).map(id => document.getElementById(id));

  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        links.forEach(l => l.classList.remove('active'));
        const a = map[e.target.id];
        if (a) {
          a.classList.add('active');
          // garante que o grupo do link ativo esteja aberto
          const grp = a.closest('.nav-group');
          if (grp) grp.classList.remove('collapsed');
        }
      }
    });
  }, { rootMargin: '-70px 0px -75% 0px', threshold: 0 });
  sections.forEach(s => obs.observe(s));

  /* --- Busca no menu --- */
  const search = document.getElementById('search');
  const noRes = document.getElementById('noResults');
  if (search) {
    search.addEventListener('input', () => {
      const q = search.value.trim().toLowerCase();
      let visible = 0;
      document.querySelectorAll('.nav-group').forEach(grp => {
        let groupHas = false;
        grp.querySelectorAll('.nav-links a').forEach(a => {
          const hit = a.textContent.toLowerCase().includes(q);
          a.classList.toggle('hidden', q && !hit);
          if (!q || hit) { groupHas = true; visible++; }
        });
        grp.style.display = (q && !groupHas) ? 'none' : '';
        if (q) grp.classList.remove('collapsed');
      });
      if (noRes) noRes.style.display = (q && visible === 0) ? 'block' : 'none';
    });
  }

  /* --- Botão voltar ao topo --- */
  const backTop = document.getElementById('backTop');
  window.addEventListener('scroll', () => {
    if (backTop) backTop.classList.toggle('show', window.scrollY > 600);
  });
  if (backTop) backTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  /* --- Copiar código --- */
  document.querySelectorAll('pre').forEach(pre => {
    const btn = document.createElement('button');
    btn.className = 'copy-btn';
    btn.textContent = 'Copiar';
    btn.addEventListener('click', () => {
      const code = pre.querySelector('code');
      navigator.clipboard.writeText(code ? code.innerText : pre.innerText).then(() => {
        btn.textContent = 'Copiado!';
        setTimeout(() => (btn.textContent = 'Copiar'), 1500);
      });
    });
    pre.appendChild(btn);
  });

})();
