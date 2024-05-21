import React from 'react'
import ReactDOM from 'react-dom/client'

import Show from './pdf.jsx'
import {Telecharger} from './pdf.jsx'
import './index.css'

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <Show/>
    <Telecharger/>
  </React.StrictMode>,
)
