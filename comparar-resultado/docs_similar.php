<?php

function get_corpus_index($corpus = array(), $separator = ' ')
{

  $dictionary = array();

  $doc_count = array();

  foreach ($corpus as $doc_id => $doc) {

    $terms = explode($separator, $doc);

    $doc_count[$doc_id] = count($terms);

    // tf–idf, short for term frequency–inverse document frequency, 
    // according to wikipedia is a numerical statistic that is intended to reflect 
    // how important a Word is to a document in a corpus

    foreach ($terms as $term) {

      if (!isset($dictionary[$term])) {

        $dictionary[$term] = array('document_frequency' => 0, 'postings' => array());
      }
      if (!isset($dictionary[$term]['postings'][$doc_id])) {

        $dictionary[$term]['document_frequency']++;

        $dictionary[$term]['postings'][$doc_id] = array('term_frequency' => 0);
      }

      $dictionary[$term]['postings'][$doc_id]['term_frequency']++;
    }

    //from http://phpir.com/simple-search-the-vector-space-model/

  }

  return array('doc_count' => $doc_count, 'dictionary' => $dictionary);
}

function get_similar_documents($query = '', $corpus = array(), $separator = ' ')
{

  $similar_documents = array();

  if ($query != '' && !empty($corpus)) {

    $words = explode($separator, $query);

    $corpus = get_corpus_index($corpus, $separator);

    $doc_count = count($corpus['doc_count']);

    foreach ($words as $Word) {

      if (isset($corpus['dictionary'][$Word])) {

        $entry = $corpus['dictionary'][$Word];


        foreach ($entry['postings'] as $doc_id => $posting) {

          //get term frequency–inverse document frequency
          $score = $posting['term_frequency'] * log($doc_count + 1 / $entry['document_frequency'] + 1, 2);

          if (isset($similar_documents[$doc_id])) {

            $similar_documents[$doc_id] += $score;
          } else {

            $similar_documents[$doc_id] = $score;
          }
        }
      }
    }

    // length normalise
    foreach ($similar_documents as $doc_id => $score) {

      $similar_documents[$doc_id] = $score / $corpus['doc_count'][$doc_id];
    }

    // sort from  high to low

    arsort($similar_documents);
  }

  return $similar_documents;
}
