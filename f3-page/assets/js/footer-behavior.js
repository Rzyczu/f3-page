document.addEventListener('DOMContentLoaded', function () {
    const isMobile = window.matchMedia("(max-width: 768px)").matches;

    document.querySelectorAll('footer .slide-link').forEach(link => {
        const type = link.dataset.type;
        const value = link.dataset.value;

        console.log(type)
        console.log(value)
        console.log(isMobile)

        if (type === 'mail' || type === 'phone') {
            link.removeAttribute('href');

            link.addEventListener('click', function (e) {
                e.preventDefault();

                let displayValue = value.replace(/^mailto:|^tel:/, '');

                if (type === 'phone') {
                    displayValue = displayValue.replace(/^(\+\d{2})(\d{3})(\d{3})(\d{3})$/, '$1 $2 $3 $4');
                }

                const existingSpan = this.querySelector('.tooltip-info');
                if (existingSpan) {
                    existingSpan.remove();
                    return;
                }

                const info = document.createElement('span');
                info.textContent = displayValue;
                info.className = 'tooltip-info';
                info.style.marginLeft = '1rem';
                info.style.fontSize = '1.125rem';
                info.style.color = 'inherit';
                info.style.userSelect = 'text';
                info.style.cursor = 'pointer';
                info.style.position = 'relative';

                const tooltip = document.createElement('div');
                tooltip.textContent = 'Skopiowano!';
                tooltip.style.position = 'absolute';
                tooltip.style.top = '-2.5em';
                tooltip.style.left = '0';
                tooltip.style.background = '#777';
                tooltip.style.color = '#fff';
                tooltip.style.fontSize = '1.125rem';
                tooltip.style.padding = '2px 6px';
                tooltip.style.borderRadius = '4px';
                tooltip.style.opacity = '0';
                tooltip.style.transition = 'opacity 0.3s ease';
                tooltip.style.pointerEvents = 'none';

                info.appendChild(tooltip);

                info.addEventListener('click', function (e) {
                    e.stopPropagation();

                    const tempInput = document.createElement('input');
                    tempInput.value = displayValue;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);

                    tooltip.style.opacity = '1';
                    setTimeout(() => {
                        tooltip.style.opacity = '0';
                    }, 1500);
                });

                this.appendChild(info);
            });
        }

        if (isMobile) {
            if (type === 'mail') link.href = value;
            if (type === 'phone') link.href = `tel:${value.replace(/^tel:/, '')}`;
        }
    });
});
