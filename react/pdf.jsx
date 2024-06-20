import React from 'react';
import { Page, Text, View, Document, StyleSheet, Image } from '@react-pdf/renderer';
import { PDFViewer } from '@react-pdf/renderer';
import { PDFDownloadLink } from '@react-pdf/renderer';

//Faire le style
// Create styles
const styles = StyleSheet.create({
  page: {
    flexDirection: 'row',
    backgroundColor: '#FFFFFF'
  },
  section: {
    margin: 10,
    padding: 10,
    flexGrow: 1
  },
  title : {
    fontSize : 30,
    textAlign : 'center',
    margin : 50
  },
  date: {
    textAlign : 'center',
    marginTop : 30
  },
  info: {
    textAlign : 'center',
    fontSize : 15,
    margin : 30
  }
});

//Créer le composant Document
// Create Document Component
const MyDocument = () => (
  <Document>
    <Page size="A4" style={styles.page}>
      <View style={styles.section}>
        <Text style={styles.title}>Bateau-tour en Gréce</Text>
        <Image src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg"></Image>
        <Text style={styles.date}>Date de départ : 31/01/2025</Text>
        <Text style={styles.date}>Date de retour : 15/02/2025</Text>
        <View style={styles.info}>
          <Text>Nombres de jour(s) : 16 jours</Text>
          <Text>Nombres de voyageur(s) : 2</Text>          
        </View>

      </View>
      {/* si on veux 2 colonne au document
      <View style={styles.section}>
        <Text>Week-end à Londres</Text>
      </View> */}
    </Page>
    <Page>
      <View style={styles.section}>
        <Text style={styles.title}>Récapitulatif des dépenses</Text>
      </View>
    </Page>
  </Document>
);

//Visualiser le pdf
//View PDF
export default function Show(){
  return (
    <div className="App" >
      <PDFViewer width='800px' height='600px' className='p-5'>
        <MyDocument/>
      </PDFViewer>
    </div>
  )
}

//Telecharger le doc
//Download
export function Download(){
  return (
    <div className="flex justify-end p-2 mr-5 ">
      <PDFDownloadLink 
        document={<MyDocument/>} 
        fileName='testPLANEA.pdf' 
        className='p-2 px-5 text-[#312c2e] bg-[#ff7f3f] border rounded-full'
      >
        {({loading})=> loading ? 'Chargement...' : 'Télécharger le pdf'}
      </PDFDownloadLink>
    </div>
  )
}