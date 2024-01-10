document.addEventListener("DOMContentLoaded", () => {
    const validationForm = document.querySelector('.validationForm');
    if(validationForm) {
        const errorClassName = 'error';
        const requiredElems = document.querySelectorAll('.required');
        console.log(requiredElems);
        const patternElems = document.querySelectorAll('.pattern');
        const maxlengthElems = document.querySelectorAll('.maxlength');
                    
        const createError = (elem, errorMessage) => {
            const errorSpan = document.createElement('span');
            errorSpan.classList.add(errorClassName);
            errorSpan.setAttribute('aria-live', 'polite');
            errorSpan.textContent = errorMessage;
            elem.parentNode.appendChild(errorSpan);
        }
        validationForm.addEventListener('submit', (e) => {
            const errorElems = e.currentTarget.querySelectorAll('.' + errorClassName);
            errorElems.forEach( (elem) => {
                elem.remove();
            });
                        
            requiredElems.forEach( (elem) => {
                const dataError = elem.getAttribute('data-error-required');
                console.log(dataError);
                if(elem.tagName === 'INPUT' && elem.getAttribute('type') === 'radio') {
                    const checkedRadio = elem.parentElement.querySelector('input[type="radio"]:checked');
                    if(checkedRadio === null) {
                        const errorMessage = dataError ? dataError : '男女どちらかを選択してください';
                        createError(elem, errorMessage);
                        e.preventDefault();
                    }
                } else {
                    const elemValue = elem.value.trim();
                    if(elemValue.length === 0) {
                        
                        if(elem.tagName === 'SELECT') {
                            const errorMessage = dataError ? dataError : '選択してください';
                        createError(elem, errorMessage);
                        } else {
                            const errorMessage = dataError ? dataError : '入力は必須です';
                            createError(elem, errorMessage);
                        }
                        e.preventDefault();
                    }
                }
            });
            patternElems.forEach( (elem) => {
                let dataPattern = elem.getAttribute('data-pattern');
                console.log(dataPattern);
                let pattern;
                const dataError = elem.getAttribute('data-error-pattern');
                let errorMessage = '';
                if(dataPattern) {
                    switch(dataPattern) {
                        case 'name1' :
                            pattern = /^[\u4E00-\u9FFF|\u3040-\u309Fー]+$/;
                            errorMessage = dataError ? dataError : '漢字もしくはひらがなで入力してください';
                            break;
                        case 'name2' :
                            pattern = /^[\u30A1-\u30F6]+$/;
                            errorMessage = dataError ? dataError : '全角カナで入力してください';
                            break;
                        case 'email' :
                            pattern = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ui;
                            errorMessage = dataError ? dataError : 'メールアドレスの形式が正しくありません';
                            break;
                        case 'password' :
                            pattern = /^[0-9A-Za-z]+$/;
                            errorMessage = dataError ? dataError : '半角英数字で入力してください';
                            break;
                        case 'postal_code' :
                            pattern = /^[0-9]+$/;
                            errorMessage = dataError ? dataError : '半角数字で入力してください';
                            break; 
                        case 'address' :
                            pattern = /^[\uFF0D|\u0020|\u002D|\u0030-\u0039|\u3000|\u3040-\u309Fー|\u30A1-\u30F6|\u4E00-\u9FFF|\uFF10-\uFF19]+$/;
                            
                                //[^!"#\$%&'\(\)=~\^\|\\`@\{\}\[\]\+;\*:<,>\.\?_\/！”＃＄％＆’（）＝～＾｜￥‘＠｛「＋；＊：｝」＜、＞。？・＿￥]+/;
                                ///[\u4E00-\u9FFF\u3040-\u309Fー\u30A1-\u30F6\uFF10-\uFF19\0-9\-\u3000| ]+$/;
                            errorMessage = dataError ? dataError : 'ひらがな、漢字、数字、カタカナ、ハイフン、スペースで入力してください';
                            break;
                        default :
                            pattern = new RegExp(dataPattern);
                            errorMessage = dataError ? dataError : '入力された形式が正しくないようです';
                    
                    }
                }
                if (elem.value.trim() !== '') {
                    if (!pattern.test(elem.value)) {
                        createError(elem, errorMessage);
                        e.preventDefault();
                    }
                }
            });
                        
            maxlengthElems.forEach( (elem) => {
                let maxlength = elem.getAttribute('data-maxlength');
                if(maxlength && elem.value !== '') {
                    if(elem.value.length > maxlength) {
                        const dataError = elem.getAttribute('data-error-maxlength');
                        const errorMessage = dataError ? dataError : maxlength + '文字以内で入力してください';
                        createError(elem, errorMessage);
                        e.preventDefault();
                    }
                }
            });
            const errorElem = validationForm.querySelector('.' + errorClassName);
            if(errorElem) {
                const errorElemOffsetTop = errorElem.offsetTop;
                window.scrollTo({
                    top: errorElemOffsetTop - 40,
                    behavior: 'smooth'
                });
            }
        });
        const showCountElems = document.querySelectorAll('.showCount');
        showCountElems.forEach( (elem) => {
            const dataMaxlength = elem.getAttribute('data-maxlength');
            if(dataMaxlength && !isNaN(dataMaxlength)) {
                const countElem = document.createElement('p');
                countElem.classList.add('countSpanWrapper');
                countElem.innerHTML = '<span class="countSpan">0</span>/' + parseInt(dataMaxlength);
                elem.parentNode.appendChild(countElem);
            }
            elem.addEventListener('input', (e) => {
                const countSpan = elem.parentElement.querySelector('.countSpan');
                if(countSpan) {
                    const count = e.currentTarget.value.length;
                    countSpan.textContent = count;
                    if(count > dataMaxlength) {
                        countSpan.style.setProperty('color', 'red');
                        countSpan.classList.add('overMaxCount');
                    } else {
                        countSpan.style.removeProperty('color');
                        countSpan.classList.remove('overMaxCount');
                    }
                }
            });
        });
    }
});