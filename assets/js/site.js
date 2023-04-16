var items = []
let wheelInt = 0

let isInViewport = function (e, offset) {
  if (!e) return false
  offset = offset ? offset : 0
  const rect = e.getBoundingClientRect()
  return (
    rect.top >= 0 &&
    rect.bottom + offset <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

document.querySelectorAll('.anchor').forEach(e => {
  items.push(e.getAttribute('name'))
})

$(window).on("load", function() {
  setTimeout(toggleLoader, 1000)
  setTimeout(() => {
    $(' html, body').css({'overflow-y': 'auto'});  
  }, 1000)
  $('.toggle-menu').click(() => {
    const overflow = document.querySelector('.overlay').classList.contains('active') ? 'auto' : 'hidden'
    document.querySelector('.overlay').classList.toggle('active')
    setTimeout(() => {
      $(' html, body').css({'overflow-y': overflow})
    }, 30)
  })
  $(window).scroll(function(e) {
    var scroll = $(window).scrollTop()
    if (scroll > 200) {
      document.querySelector('.header').classList.add('scroll')
    } else {
      document.querySelector('.header').classList.remove('scroll')
    }
  })
})

window.addEventListener("wheel", e => {
  if (wheelInt) {
    clearInterval(wheelInt)
  }

  const delta = Math.sign(e.deltaY)
  const item = window.location.hash.replace('#', '') || document.querySelectorAll('.anchor')[0].getAttribute('name')
  const target = delta > 0 ? document.querySelector(`.tail[name="${item}"]`) : document.querySelector(`.anchor[name="${item}"]`)

  if ( delta > 0 && item === items[items.length - 1] || items.length === 1) {
    console.log('lastitem')
    return true
  }

  if (isInViewport(target, 50)) {
    console.log('viewport')
    wheelInt = setTimeout(() => {
      var i = items.indexOf(item)
      if (i || i > -1 && delta > 0) {
        const itemTo = delta > 0 ? i++ : i--
        if (items[i]) {
          console.log('hash',items[i])
          window.location.hash = items[i]
        }
      }
    }, 100)

    e.preventDefault()
    e.stopPropagation()
  }
  return false
}, {
  passive: false
})

function toggleLoader(){
  $('.loader-container').removeClass('fadeOut')
  $('.loader-container').addClass('fadeIn')

  setTimeout(() => {
    $('#loader').toggleClass('loader-invisible');  
  }, 350)
}

// window.scrollTo(0,0)