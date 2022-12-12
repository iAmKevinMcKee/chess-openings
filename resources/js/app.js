import './bootstrap';

import Alpine from 'alpinejs'
import Chess from './chess.js'

window.Alpine = Alpine
Alpine.data('chess', Chess)


Alpine.start()
