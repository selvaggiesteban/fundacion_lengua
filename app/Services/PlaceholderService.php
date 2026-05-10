<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PlaceholderService
{
    /**
     * Reemplaza los placeholders en un contenido dado con los valores de una entidad.
     *
     * @param string $content El contenido de la plantilla (asunto o cuerpo).
     * @param Model $entity La instancia del modelo de la entidad (ej. Student, Scholarship).
     * @param string $entityPrefix El prefijo para los placeholders (ej. 'student', 'scholarship').
     * @return string El contenido con los placeholders reemplazados.
     */
    public function replace(string $content, Model $entity, string $entityPrefix): string
    {
        $pattern = '/\(' . preg_quote($entityPrefix, '/') . '_([a-zA-Z0-9_]+)\)/';
        
        $processedContent = preg_replace_callback($pattern, function ($matches) use ($entity) {
            $fieldName = $matches[1];
            
            if (isset($entity->{$fieldName})) {
                $value = $entity->{$fieldName};
                
                if ($value instanceof Carbon) {
                    return $value->format('d/m/Y');
                }
                
                return is_scalar($value) ? $value : '';
            }

            return '';
        }, $content);

        return $processedContent;
    }
}