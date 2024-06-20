import React from 'react'
import ReactDOM from 'react-dom/client'

import Show from './pdf.jsx'
import {Download} from './pdf.jsx'


ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <Show/>
    <Download/>
  </React.StrictMode>,
)


